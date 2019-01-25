<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTest1APIRequest;
use App\Http\Requests\API\UpdateTest1APIRequest;
use App\Models\Test1;
use App\Repositories\Backend\Test1Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class Test1APIController
 * @package App\Http\Controllers\API
 */
class Test1APIController extends Controller
{
    /** @var  Test1Repository */
    private $test1Repository;
    /** @var  Test1Model */
    private $test1Model;

    public function __construct(Test1Repository $test1Repo, Test1 $test1)
    {
        $this->test1Repository = $test1Repo->skipCache(true);
        $this->test1Model = $test1;
    }

    /**
     * Display a listing of the Test1.
     * GET|HEAD /test1s
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $test1s = $this->test1Repository->all();
        return response()->json([
            'data' => $test1s,
            'Test1s retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Test1 in storage.
     * POST /test1s
     *
     * @param CreateTest1APIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateTest1APIRequest $request)
    {
        $input = $request->all();
        $this->test1Repository->create($input);
        return response()->json(['Test1 saved successfully']);
    }

    /**
     * Display the specified Test1.
     * GET|HEAD /test1s/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Test1 $test1 */
        //   $test1 = $this->test1Repository->findByField('id',$id);
        $test1 = $this->test1Model->find($id);
        return response()->json([
            'data' => $test1,
            'Test1 retrieved successfully'
        ]);
    }

    /**
     * Update the specified Test1 in storage.
     * PUT/PATCH /test1s/{id}
     *
     * @param  int $id
     * @param UpdateTest1APIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateTest1APIRequest $request)
    {
        $input = $request->all();
        /** @var Test1 $test1 */
        $test1 = $this->test1Model->find($id);
        $test1 = $this->test1Repository->update($test1, $input);
        return response()->json(['Test1 updated successfully']);
    }

    /**
     * Remove the specified Test1 from storage.
     * DELETE /test1s/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Test1 $test1 */
        $test1 = $this->test1Model->find($id);
        $test1->delete();

        return response()->json('Test1 deleted successfully');
    }
}
