@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="tabs" class="tabs">
                    <nav>
                        <ul>
                            <li>
                                <a href="#users"
                                   class="icon icon-user">
                                    <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="#organisations"
                                   class="icon icon-user">
                                    <span>Organisations</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="content">
                        <section id="users">
                            <crud delete-url="{{ url('/users') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Users

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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="data-table" class="table table-responsive">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Username</th>
                                                                <th class="text-center">
                                                                    Actions
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Username</th>
                                                                <th class="text-center">
                                                                    Actions
                                                                </th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                            @foreach($users as $user)
                                                                <tr>
                                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                                    <td>{{ $user->surName }}</td>
                                                                    <td>{{ $user->otherNames }}</td>
                                                                    <td>{{ $user->userName }}</td>
                                                                    <th class="text-center">
                                                                        <i v-on:click="updateModel({{ json_encode($user) }})"
                                                                           class="fa fa-edit info-icon"></i>

                                                                        <i v-on:click="deleteDepartment({{ $user->id }})"
                                                                           class="fa fa-trash danger-icon"></i>
                                                                    </th>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-show="creating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Create new user
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ url('/users') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="surName">SurName:</label>
                                                                        <input id="surName"
                                                                               name="surName"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="otherNames">Other Names:</label>
                                                                        <input id="otherNames"
                                                                               name="otherNames"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="userName">Username:</label>
                                                                        <input id="userName"
                                                                               name="userName"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="emailAddress">Email:</label>
                                                                        <input id="emailAddress"
                                                                               name="emailAddress"
                                                                               type="email"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="password">Password:</label>
                                                                        <input id="password"
                                                                               name="password"
                                                                               type="password"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="password_confirmation">Confirm Password:</label>
                                                                        <input id="password_confirmation"
                                                                               name="password_confirmation"
                                                                               type="password"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="IDTypeID">ID type:</label>
                                                                        <select class="form-control"
                                                                                name="IDTypeID"
                                                                                id="IDTypeID">
                                                                            <option value="id">Identity Card</option>
                                                                            <option value="passport">Passport Card</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="idNumber">ID Number:</label>
                                                                        <input id="idNumber"
                                                                               name="idNumber"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="departments">Departments</label>
                                                                        <select class="form-control"
                                                                                name="departments[]"
                                                                                id="departments"
                                                                                multiple>
                                                                            @foreach($departments as $department)
                                                                                <option value="{{ $department->id }}">
                                                                                    {{ $department->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    @foreach($roles as $role)
                                                                        <label class="radio-inline">
                                                                            <input type="radio"
                                                                                   checked
                                                                                   name="role"
                                                                                   id="{{ $role->slug }}"
                                                                                   value="{{ $role->id }}">
                                                                            {{ $role->name }}
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create user
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
                                                            Update a user
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form v-bind:action="'{{ url('/users') }}' + '/' + model.id"
                                                              method="POST">

                                                            {{ csrf_field() }}

                                                            {{ method_field('PUT') }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="surName">SurName:</label>
                                                                        <input id="surName"
                                                                               name="surName"
                                                                               type="text"
                                                                               v-model="model.surName"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="otherNames">Other Names:</label>
                                                                        <input id="otherNames"
                                                                               name="otherNames"
                                                                               type="text"
                                                                               v-model="model.otherNames"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="userName">Username:</label>
                                                                        <input id="userName"
                                                                               name="userName"
                                                                               type="text"
                                                                               v-model="model.userName"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="emailAddress">Email:</label>
                                                                        <input id="emailAddress"
                                                                               name="emailAddress"
                                                                               type="email"
                                                                               v-model="model.emailAddress"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="IDTypeID">ID type:</label>
                                                                        <select v-model="model.IDTypeID"
                                                                                class="form-control"
                                                                                name="IDTypeID"
                                                                                id="IDTypeID">
                                                                            <option value="id">
                                                                                Identity Card
                                                                            </option>
                                                                            <option value="passport">
                                                                                Passport Card
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="idNumber">ID Number:</label>
                                                                        <input id="idNumber"
                                                                               name="idNumber"
                                                                               type="text"
                                                                               v-model="model.idNumber"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="departments">Departments</label>
                                                                        <select v-model="model.dep_assignment"
                                                                                class="form-control"
                                                                                name="departments[]"
                                                                                id="departments"
                                                                                multiple>
                                                                            @foreach($departments as $department)
                                                                                <option value="{{ $department->id }}">
                                                                                    {{ $department->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    @foreach($roles as $role)
                                                                        <label class="radio-inline">
                                                                            <input type="radio"
                                                                                   checked
                                                                                   name="role"
                                                                                   v-model="role"
                                                                                   id="{{ $role->slug }}"
                                                                                   value="{{ $role->id }}">
                                                                            {{ $role->name }}
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Update user
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

                        <section id="organisations">
                            <crud delete-url="{{ url('/organisations') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Organisations

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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="data-table-1" class="table table-responsive">
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
                                                            @foreach($organisations as $organisation)
                                                                <tr>
                                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                                    <td>{{ $organisation->orgName }}</td>
                                                                    <th class="text-center">
                                                                        <i v-on:click="updateModel({{ json_encode($organisation) }})"
                                                                           class="fa fa-edit info-icon"></i>

                                                                        <i v-on:click="deleteDepartment({{ $organisation->id }})"
                                                                           class="fa fa-trash danger-icon"></i>
                                                                    </th>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-show="creating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>
                                                            Create new organisation
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ url('/organisations') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="orgName">Organisation Name:</label>
                                                                        <input id="orgName"
                                                                               name="orgName"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create Organization
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
                                                            Update an organization
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form v-bind:action="'{{ url('/organisations') }}' + '/' + model.id"
                                                              method="POST">

                                                            {{ csrf_field() }}

                                                            {{ method_field('PUT') }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="orgName">Organisation Name:</label>
                                                                        <input id="orgName"
                                                                               name="orgName"
                                                                               type="text"
                                                                               v-model="model.orgName"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Update organisation
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