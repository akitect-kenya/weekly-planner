@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <crud delete-url="{{ url('/users') }}" inline-template>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Users

                            <a v-if="!creating" href="#" v-on:click="create()" class="pull-right">
                                New
                            </a>

                            <a v-if="creating" href="#" v-on:click="cancel()" class="pull-right">
                                Cancel
                            </a>
                        </div>

                        <div class="panel-body">
                            <div class="crud">
                                <div v-if="!creating" class="crud-list">
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
                                                            <i v-on:click="deleteDepartment({{ $user->id }})"
                                                               class="fa fa-trash danger-icon"></i>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 is-centered footer">
                                            {{ $users->links() }}
                                        </div>
                                    </div>
                                </div>

                                <div v-if="creating" class="crud-form">
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
                                                        <label class="radio-inline">
                                                            <input type="radio" checked name="role" id="coordinator" value="1"> Coordinator
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="role" id="teacher" value="2"> Teacher
                                                        </label>
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
                            </div>
                        </div>
                    </div>
                </crud>
            </div>
        </div>
    </div>
@endsection
