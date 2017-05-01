@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="tabs" class="tabs">
                    <nav>
                        <ul>
                            <li>
                                <a href="#wb-setup" class="icon icon-settings">
                                    <span>WB Setup</span>
                                </a>
                            </li>

                            <li>
                                <a href="#weekly-plans" class="icon icon-calendar">
                                    <span>Weekly Plans</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="content">
                        <section id="wb-setup">
                            <crud delete-url="{{ url('/setups') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Weekly Setups

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
                                                        <th>No. of Days</th>
                                                        <th>No. of periods</th>
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
                                                        <th>No. of Days</th>
                                                        <th>No. of periods</th>
                                                        <th>Description</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($wbSetups as $wbSetup)
                                                        <tr>
                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                            <td>{{ $wbSetup->weeklySetupName }}</td>
                                                            <td>{{ $wbSetup->noDaysWeek }}</td>
                                                            <td>{{ $wbSetup->noPeriodsDay }}</td>
                                                            <td>{{ $wbSetup->workPlanDesc }}</td>
                                                            <th class="text-center">
                                                                <i v-on:click="deleteDepartment({{ $wbSetup->id }})"
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
                                                        <form action="{{ url('/setups') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="weeklySetupName">Name:</label>
                                                                        <input id="weeklySetupName"
                                                                               name="weeklySetupName"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="noDaysWeek">No. of days of the week:</label>
                                                                        <input id="noDaysWeek"
                                                                               name="noDaysWeek"
                                                                               type="number"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="startDay">First day of the week:</label>
                                                                        <select class="form-control"
                                                                                name="startDay"
                                                                                id="startDay">
                                                                            <option value="sunday">Sunday</option>
                                                                            <option value="monday">Monday</option>
                                                                            <option value="tuesday">Tuesday</option>
                                                                            <option value="wednesday">Wednesday</option>
                                                                            <option value="thursday">Thursday</option>
                                                                            <option value="friday">Friday</option>
                                                                            <option value="saturday">Saturday</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="noPeriodsDay">No. of periods in a day:</label>
                                                                        <input id="noPeriodsDay"
                                                                               name="noPeriodsDay"
                                                                               type="number"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="workPlanDesc">Description:</label>
                                                                        <textarea name="workPlanDesc"
                                                                                  id="workPlanDesc"
                                                                                  cols="30"
                                                                                  class="form-control"
                                                                                  rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create Weekly Setup
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
                        <section id="weekly-plans">
                            <crud delete-url="{{ url('/plans') }}" inline-template>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Weekly Setups

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
                                                <table id="data-table-1" class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>No. of Days</th>
                                                        <th>No. of periods</th>
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
                                                        <th>No. of Days</th>
                                                        <th>No. of periods</th>
                                                        <th>Description</th>
                                                        <th class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($wbSetups as $wbSetup)
                                                        <tr>
                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                            <td>{{ $wbSetup->weeklySetupName }}</td>
                                                            <td>{{ $wbSetup->noDaysWeek }}</td>
                                                            <td>{{ $wbSetup->noPeriodsDay }}</td>
                                                            <td>{{ $wbSetup->workPlanDesc }}</td>
                                                            <th class="text-center">
                                                                <i v-on:click="deleteDepartment({{ $wbSetup->id }})"
                                                                   class="fa fa-trash danger-icon"></i>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div v-if="creating" class="crud-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ url('/setups') }}" method="POST">

                                                            {{ csrf_field() }}

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="weeklySetupName">Name:</label>
                                                                        <input id="weeklySetupName"
                                                                               name="weeklySetupName"
                                                                               type="text"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="noDaysWeek">No. of days of the week:</label>
                                                                        <input id="noDaysWeek"
                                                                               name="noDaysWeek"
                                                                               type="number"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="startDay">First day of the week:</label>
                                                                        <select class="form-control"
                                                                                name="startDay"
                                                                                id="startDay">
                                                                            <option value="sunday">Sunday</option>
                                                                            <option value="monday">Monday</option>
                                                                            <option value="tuesday">Tuesday</option>
                                                                            <option value="wednesday">Wednesday</option>
                                                                            <option value="thursday">Thursday</option>
                                                                            <option value="friday">Friday</option>
                                                                            <option value="saturday">Saturday</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="noPeriodsDay">No. of periods in a day:</label>
                                                                        <input id="noPeriodsDay"
                                                                               name="noPeriodsDay"
                                                                               type="number"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="workPlanDesc">Description:</label>
                                                                        <textarea name="workPlanDesc"
                                                                                  id="workPlanDesc"
                                                                                  cols="30"
                                                                                  class="form-control"
                                                                                  rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-submit">
                                                                        Create Weekly Setup
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
