@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="tabs" class="tabs">
                <nav>
                    <ul>
                        <li><a href="#wb-setup" class="icon icon-settings"><span>WB Setup</span></a></li>
                        <li><a href="#grades" class="icon icon-t-shirt"><span>Grades</span></a></li>
                        <li><a href="#weekly-plans" class="icon icon-calendar"><span>Weekly Plans</span></a></li>
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
                                        <div v-if="!creating" class="crud-list">
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
                    <section id="grades">
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
                                        <div v-if="!creating" class="crud-list">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    #
                                                </div>

                                                <div class="col-md-2">
                                                    Name
                                                </div>

                                                <div class="col-md-2">
                                                    No. of Days
                                                </div>

                                                <div class="col-md-2">
                                                    No. of periods
                                                </div>

                                                <div class="col-md-3">
                                                    Description
                                                </div>

                                                <div class="col-md-2 text-center">
                                                    Actions
                                                </div>
                                            </div>
                                            @foreach($wbSetups as $wbSetup)
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        {{ $loop->index + 1 }}
                                                    </div>

                                                    <div class="col-md-2">
                                                        {{ $wbSetup->weeklySetupName }}
                                                    </div>

                                                    <div class="col-md-2">
                                                        {{ $wbSetup->noDaysWeek }}
                                                    </div>

                                                    <div class="col-md-2">
                                                        {{ $wbSetup->noPeriodsDay }}
                                                    </div>

                                                    <div class="col-md-3">
                                                        {{ $wbSetup->workPlanDesc }}
                                                    </div>

                                                    <div class="col-md-2 text-center">
                                                        <i v-on:click="deleteDepartment({{ $wbSetup->id }})" class="fa fa-trash danger-icon"></i>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="row">
                                                <div class="col-md-12 is-centered footer">
                                                    {{ $wbSetups->links() }}
                                                </div>
                                            </div>
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
                    <section id="weekly-plans">
                        <div class="mediabox">
                            <img src="img/02.png" alt="img02" />
                            <h3>Noodle Curry</h3>
                            <p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.Sushi gumbo beet greens corn soko endive gumbo gourd.</p>
                        </div>
                        <div class="mediabox">
                            <img src="img/06.png" alt="img06" />
                            <h3>Leek Wasabi</h3>
                            <p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
                        </div>
                        <div class="mediabox">
                            <img src="img/01.png" alt="img01" />
                            <h3>Green Tofu Wrap</h3>
                            <p>Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
                        </div>
                    </section>
                </div><!-- /content -->
            </div><!-- /tabs -->
        </div>
    </div>
</div>
@endsection
