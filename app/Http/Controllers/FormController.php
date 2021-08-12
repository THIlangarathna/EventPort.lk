<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use jazmy\FormBuilder\Events\Form\FormCreated;
use jazmy\FormBuilder\Events\Form\FormDeleted;
use jazmy\FormBuilder\Events\Form\FormUpdated;
use jazmy\FormBuilder\Helper;
use jazmy\FormBuilder\Models\Form;
use jazmy\FormBuilder\Requests\SaveFormRequest;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Event;
use Illuminate\Support\Facades\Crypt;
use Session;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Forms";

        $forms = Form::getForUser(auth()->user());

        //return view('formbuilder::forms.index', compact('pageTitle', 'forms'));
        return redirect('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create New Form";

        $saveURL = route('formbuilder::forms.store');

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = Helper::getConfiguredRoles();

        return view('Forms.create', compact('pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  jazmy\FormBuilder\Requests\SaveFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveFormRequest $request)
    {
        $user = $request->user();
        $userid=$user->id;

        $eventid=DB::table('events')
        ->where('user_id', $userid)
        ->max('id');

        //Session::put('event_id', $eventid);
        session(['event_id' => $eventid]);

        $input = $request->merge(['user_id' => $user->id])->except('_token');
        //$input = $request->merge(['event_id' => $event->id]);
        $input['event_id'] = $eventid;

        DB::beginTransaction();

        // generate a random identifier
        $input['identifier'] = $user->id.'-'.Helper::randomString(20);
        $created = Form::create($input);

        try {
            // dispatch the event
            event(new FormCreated($created));

            DB::commit();

            return response()
                    ->json([
                        'success' => true,
                        'details' => 'Form successfully created!',
                        'dest' => route('formbuilder::forms.index'),
                    ]);
        } catch (Throwable $e) {
            info($e);

            DB::rollback();

            return response()->json(['success' => false, 'details' => 'Failed to create the form.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])
                    ->with('user')
                    ->withCount('submissions')
                    ->firstOrFail();

        $pageTitle = "Preview Form";

        return view('Forms.show', compact('pageTitle', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $id = Crypt::decrypt($id);

        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $pageTitle = 'Edit Form';

        $saveURL = route('formbuilder::forms.update', $form);

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = Helper::getConfiguredRoles();

        return view('Forms.edit', compact('form', 'pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  jazmy\FormBuilder\Requests\SaveFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveFormRequest $request, $id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $input = $request->except('_token');

        if ($form->update($input)) {
            // dispatch the event
            event(new FormUpdated($form));

            return response()
                    ->json([
                        'success' => true,
                        'details' => 'Form successfully updated!',
                        'dest' => route('formbuilder::forms.index'),
                    ]);
        } else {
            response()->json(['success' => false, 'details' => 'Failed to update the form.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $form->delete();

        // dispatch the event
        event(new FormDeleted($form));

        return back()->with('success', "'{$form->name}' deleted.");
    }
    public function revokeURL($id)
    {
        $id = Crypt::decrypt($id);
        $userid = auth()->user()->id;
        $form = Form::where(['identifier' => $id,'user_id' => $userid,])->update(['live' => 0]);

        return back();
        //return $id;
    }
    public function liveURL($id)
    {
        $id = Crypt::decrypt($id);
        $userid = auth()->user()->id;
        $form = Form::where(['identifier' => $id,'user_id' => $userid,])->update(['live' => 1]);

        return back();
        //return $id;
    }
}

