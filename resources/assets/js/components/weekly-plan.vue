<script>
    export default {

        methods: {
            addSubjectPlan() {
                this.subjectPlans.push($.extend({}, this.subjectPlan));
            },

            addPlanSubjectPlan() {
                this.plan.weekly_plan_subject.push($.extend({}, this.subjectPlan));
            },

            submit () {
                // Build the weekly plan object.
                let weekly_plan_data = {
                    grade_id: this.grade_id,
                    weekly_setup_id: this.weekly_setup_id,
                    subjectPlans: this.subjectPlans
                };

                // Build the form.
                let form = $(document.createElement('form'));

                $(form).attr("action", this.createWeeklyPlanUrl);
                $(form).attr("method", "POST");
                $(form).css("display", "none");

                // Add form elements.
                let weekly_plan = this.formInput("text", "weekly_plan", JSON.stringify(weekly_plan_data));
                $(form).append($(weekly_plan));

                let csrf_token = this.formInput("hidden", "_token", window.Laravel.csrfToken);
                $(form).append($(csrf_token));

                // Add the form to the document body.
                form.appendTo(document.body);

                // Add submit button.
                $(form).append(
                    $("<input>")
                        .attr("id", "create-weekly-plan")
                        .attr("type", 'submit')
                        .attr("name", 'submit')
                        .val('Submit')
                );

                // Submit the form.
                $("#create-weekly-plan").click();

            },

            update () {
                // Build the form.
                let form = $(document.createElement('form'));

                $(form).attr("action", this.updateWeeklyPlanUrl + '/' + this.plan.id);
                $(form).attr("method", "POST");
                $(form).css("display", "none");

                // Add form elements.
                let weekly_plan = this.formInput("text", "weekly_plan", JSON.stringify(this.plan));
                $(form).append($(weekly_plan));

                let csrf_token = this.formInput("hidden", "_token", window.Laravel.csrfToken);
                $(form).append($(csrf_token));

                let method = this.formInput("hidden", "_method", 'PUT');
                $(form).append($(method));

                // Add the form to the document body.
                form.appendTo(document.body);

                // Add submit button.
                $(form).append(
                    $("<input>")
                        .attr("id", "update-weekly-plan")
                        .attr("type", 'submit')
                        .attr("name", 'submit')
                        .val('Update')
                );

                // Submit the form.
                $("#update-weekly-plan").click();

            },

            formInput(type, name, value) {

                return $("<input>")
                    .attr("type", type)
                    .attr("name", name)
                    .val(value);
            }
        },

        computed: {
            plan() {
                return this.model;
            }
        },

        data() {
            return {
                grade_id: null,
                weekly_setup_id: null,
                subjectPlan: {
                    classWork: null,
                    homeWork: null,
                    numberOfPeriods: '',
                    subject_id: '',
                    week_day_id: '',
                },
                subjectPlans: [],
            }
        },

        props: [
            'createWeeklyPlanUrl',
            'model',
            'updateWeeklyPlanUrl'
        ],

        name: 'weekly-plan'

    }
</script>