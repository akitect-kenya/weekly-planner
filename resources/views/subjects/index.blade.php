@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <crud delete-url="{{ url('/subjects') }}" inline-template>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Subjects

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
                            </div>
                        </div>
                    </div>
                </crud>
            </div>
        </div>
    </div>
@endsection
