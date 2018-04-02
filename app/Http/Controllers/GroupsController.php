<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstituitionRepository;
use App\Repositories\UserRepository;
use App\Validators\GroupValidator;
use App\Services\GroupService;
use App\Entities\Group;


class GroupsController extends Controller
{
    protected $instituitionRepository;
    protected $userRepository;
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service, InstituitionRepository $instituitionRepository, UserRepository $userRepository)
    {
        $this->instituitionRepository   = $instituitionRepository;
        $this->userRepository           = $userRepository;
        $this->repository               = $repository;
        $this->validator                = $validator;
        $this->service                  = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups             = $this->repository->all();
        $user_list          = $this->userRepository->selectBoxList();
        $instituition_list  = $this->instituitionRepository->selectBoxList();

        return view('groups.index', [
            'groups'                => $groups,
            'user_list'             => $user_list,
            'instituition_list'     => $instituition_list,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $group   = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);

        return redirect()->route('group.index');
    }


    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($group_id, $request->all());

        session()->flash('success', [
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);

        return redirect()->route('group.show', [$group_id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group      = $this->repository->find($id);
        $user_list  = $this->userRepository->selectBoxList();

        return view('groups.show', [
            'group'         => $group,
            'user_list'     => $user_list
        ]);
    }


    public function edit($id)
    {
        $group              = Group::find($id);
        $user_list          = $this->userRepository->selectBoxList();
        $instituition_list  = $this->instituitionRepository->selectBoxList();

        return view('groups.edit', [
            'group'             => $group,               
            'user_list'         => $user_list,               
            'instituition_list' => $instituition_list,               
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $group_id)
    {
        $request = $this->service->update( (int) $group_id, $request->all());

        session()->flash('success', [
            'success'   => $request['success'],
            'messages'  => $request['messages']
        ]);

        return redirect()->route('group.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->route('group.index');
    }
}
