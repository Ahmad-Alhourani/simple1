<?php

namespace App\Http\Controllers\Backend\Test1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Test1\CreateTest1;
use App\Http\Requests\Backend\Test1\UpdateTest1;
use App\Repositories\Backend\Test1Repository;
use App\Events\Backend\Test1\Test1Created;
use App\Events\Backend\Test1\Test1Updated;
use App\Events\Backend\Test1\Test1Deleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Test1;

class Test1Controller extends Controller
{
    /** @var $test1Repository */
    private $test1Repository;

    public function __construct(Test1Repository $test1Repo)
    {
        $this->test1Repository = $test1Repo;
    }

    /**
     * Display a listing of the Test1.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->test1Repository->pushCriteria(new RequestCriteria($request));
        $data = $this->test1Repository->getPaginatedAndSortable(10);

        return view('backend.test1s.index')->with('test1s', $data);
    }

    /**
     * Show the form for creating a new Test1.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        return view('backend.test1s.create');
    }

    /**
     * Store a newly created Test1 in storage.
     *
     * @param CreateTest1 $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateTest1 $request)
    {
        $obj = $this->test1Repository->create(
            $request->only(["name", "l_name", "email", "sms"])
        );

        event(new Test1Created($obj));
        return redirect()
            ->route('admin.test1.index')
            ->withFlashSuccess(__('alerts.frontend.test1.saved'));
    }

    /**
     * Display the specified Test1.
     *
     * @param Test1 $test1
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Test1 $test1)
    {
        return view('backend.test1s.show')->with('test1', $test1);
    }

    /**
     * Show the form for editing the specified Test1.
     *
     * @param Test1 $test1
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Test1 $test1)
    {
        return view('backend.test1s.edit')->with('test1', $test1);
    }

    /**
     * Update the specified Test1 in storage.
     *
     * @param UpdateTest1 $request
     *
     * @param Test1 $test1
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateTest1 $request, Test1 $test1)
    {
        $obj = $this->test1Repository->update($request->all(), $test1);

        event(new Test1Updated($obj));
        return redirect()
            ->route('admin.test1.index')
            ->withFlashSuccess(__('alerts.frontend.test1.updated'));
    }

    /**
     * Remove the specified Test1 from storage.
     *
     * @param Test1 $test1
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Test1 $test1)
    {
        $obj = $this->test1Repository->delete($test1);
        event(new Test1Deleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.test1.deleted'));
    }
}
