@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="tabs" class="tabs">
                    <nav>
                        <ul>
                            <li>
                                <a id="tab-link"
                                   href="#departments"
                                   class="icon icon-settings">
                                    <span>Departments</span>
                                </a>
                            </li>

                            <li>
                                <a id="tab-link"
                                   href="#grades"
                                   class="icon icon-t-shirt">
                                    <span>Grades</span>
                                </a>
                            </li>

                            <li>
                                <a id="tab-link"
                                   href="#subjects"
                                   class="icon icon-calendar">
                                    <span>Subjects</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="content">
                        <section id="departments">
                            <crud delete-url="{{ url('/departments') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Departments

                                        <a v-if="!creating && !updating" href="#" v-on:click="create()" class="pull-right">
                                            New
                                        </a>

                                        <a v-if="creating || updating" href="#" v-on:click="cancel()" class="pull-right">
                                            Cancel
                                        </a>
                                    </div>

                                    <div class="panel-body">
                                        <div class="crud">
                                            <div v-show="!creating && !updating" class="crud-list">
                                                <table id="data-table" class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($departments as $department)
                                                        <tr>
                                                            <th>{{ $loop->index + 1 }}</th>
                                                            <th>{{ $department->name }}</th>
                                                            <th class="text-center">
                                                                <i v-on:click="updateModel({{ json_encode($department) }})"
                                                                   class="fa fa-edit info-icon"></i>

                                                                <i v-on:click="deleteDepartment({{ $department->id }})"
                                                                   class="fa fa-trash danger-icon"></i>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div v-show="creating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Create new department
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ url('/departments') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Name:</label>
                                                                        <input id="name"
                                                                               name="name"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create department
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-show="updating" class="crud-edit">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Update department
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form v-bind:action="'{{ url('/departments') }}' + '/' + model.id"
                                                              method="POST">

                                                            {{ csrf_field() }}

                                                            {{ method_field('PUT') }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Name:</label>
                                                                        <input id="name"
                                                                               name="name"
                                                                               type="text"
                                                                               v-model="model.name"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Update department
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </crud>
                        </section>

                        <section id="grades">
                            <crud delete-url="{{ url('/grades') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Grades

                                        <a v-if="!creating && !updating" href="#" v-on:click="create()" class="pull-right">
                                            New
                                        </a>

                                        <a v-if="creating || updating" href="#" v-on:click="cancel()" class="pull-right">
                                            Cancel
                                        </a>
                                    </div>

                                    <div class="panel-body">
                                        <div class="crud">
                                            <div v-show="!creating && !updating" class="crud-list">
                                                <table id="data-table-1" class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Level</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Level</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($grades as $grade)
                                                        <tr>
                                                            <th>{{ $loop->index + 1 }}</th>
                                                            <th>{{ $grade->class_name }}</th>
                                                            <th>{{ $grade->class_desc }}</th>
                                                            <th>{{ $grade->level }}</th>
                                                            <th class="text-center">
                                                                <i v-on:click="updateModel({{ json_encode($grade) }})"
                                                                   class="fa fa-edit info-icon"></i>

                                                                <i v-on:click="deleteDepartment({{ $grade->id }})"
                                                                   class="fa fa-trash danger-icon"></i>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div v-show="creating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Create new grades
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ url('/grades') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="class_name">Name:</label>
                                                                        <input id="class_name"
                                                                               name="class_name"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="level">Level:</label>
                                                                        <input id="level"
                                                                               name="level"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="class_desc">Description:</label>
                                                                        <textarea name="class_desc"
                                                                                  id="class_desc"
                                                                                  cols="30"
                                                                                  class="form-control"
                                                                                  rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create grades
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-show="updating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Update grade
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form v-bind:action="'{{ url('/grades') }}' + '/' + model.id"
                                                              method="POST">

                                                            {{ csrf_field() }}

                                                            {{ method_field('PUT') }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="class_name">Name:</label>
                                                                        <input id="class_name"
                                                                               name="class_name"
                                                                               type="text"
                                                                               v-model="model.class_name"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="level">Level:</label>
                                                                        <input id="level"
                                                                               name="level"
                                                                               type="text"
                                                                               v-model="model.level"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="class_desc">Description:</label>
                                                                        <textarea name="class_desc"
                                                                                  id="class_desc"
                                                                                  cols="30"
                                                                                  class="form-control"
                                                                                  v-model="model.class_desc"
                                                                                  rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Update grade
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </crud>
                        </section>

                        <section id="subjects">
                            <crud delete-url="{{ url('/subjects') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Subjects

                                        <a v-if="!creating && !updating" href="#" v-on:click="create()" class="pull-right">
                                            New
                                        </a>

                                        <a v-if="creating || updating" href="#" v-on:click="cancel()" class="pull-right">
                                            Cancel
                                        </a>
                                    </div>

                                    <div class="panel-body">
                                        <div class="crud">
                                            <div v-show="!creating && !updating" class="crud-list">
                                                <table id="data-table-2" class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($subjects as $subject)
                                                        <tr>
                                                            <th>{{ $loop->index + 1 }}</th>
                                                            <th>{{ $subject->name }}</th>
                                                            <th>{{ $subject->subj_desc }}</th>
                                                            <th class="text-center">
                                                                <i v-on:click="updateModel({{ json_encode($subject) }})"
                                                                   class="fa fa-edit info-icon"></i>

                                                                <i v-on:click="deleteDepartment({{ $subject->id }})"
                                                                   class="fa fa-trash danger-icon"></i>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div v-show="creating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Create new subject
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ url('/subjects') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Name:</label>
                                                                        <input id="name"
                                                                               name="name"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="subj_desc">Subject Description:</label>
                                                                        <textarea name="subj_desc"
                                                                                  id="subj_desc"
                                                                                  cols="30"
                                                                                  class="form-control"
                                                                                  rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create subject
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-show="updating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Update a subject
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form v-bind:action="'{{ url('/subjects') }}' + '/' + model.id"
                                                              method="POST">

                                                            {{ csrf_field() }}

                                                            {{ method_field('PUT') }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Name:</label>
                                                                        <input id="name"
                                                                               name="name"
                                                                               type="text"
                                                                               v-model="model.name"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="subj_desc">Subject Description:</label>
                                                                        <textarea name="subj_desc"
                                                                                  id="subj_desc"
                                                                                  cols="30"
                                                                                  class="form-control"
                                                                                  rows="10"
                                                                                  v-model="model.subj_desc"
                                                                                  ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Update subject
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </crud>
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </div>
        </div>
    </div>
@endsection