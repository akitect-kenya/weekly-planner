@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <crud delete-url="{{ url('/departments') }}" inline-template>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Departments

                            <a v-if="!creating" href="#" v-on:click="create()" class="pull-right">
                                New
                            </a>

                            <a v-if="creating" href="#" v-on:click="cancel()" class="pull-right">
                                Cancel
                            </a>
                        </div>

                        <div class="panel-body">
                            <div class="crud">
                                <div v-show="!creating" class="crud-list">
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
                            </div>
                        </div>
                    </div>
                </crud>
            </div>
        </div>
    </div>
@endsection
