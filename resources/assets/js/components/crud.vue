<script>
    export default {

        methods: {
            create() {
                this.creating = true;
            },

            cancel() {
                this.creating = false;
                this.updating = false;
            },

            deleteDepartment(id) {

                // Build the form.
                let form = $(document.createElement('form'));

                // Disable redirect: $(form).attr("target", "_blank");
                $(form).attr("action", this.deleteUrl + '/' + id);
                $(form).attr("method", "POST");
                $(form).css("display", "none");

                // Add form elements.
                let csrf_token = this.formInput("hidden", "_token", window.Laravel.csrfToken);
                $(form).append($(csrf_token));

                let delete_method = this.formInput("hidden", "_method", 'DELETE');
                $(form).append($(delete_method));

                // Add the form to the document body.
                form.appendTo(document.body);

                // Add submit button.
                $(form).append(
                    $("<input>")
                        .attr("id", "delete-department")
                        .attr("type", 'submit')
                        .attr("name", 'submit')
                        .val('Submit')
                );

                // Submit the form.
                $("#delete-department").click();
            },

            formInput(type, name, value) {

                return $("<input>")
                    .attr("type", type)
                    .attr("name", name)
                    .val(value);
            },

            updateModel(model) {
                this.updating = true;
                this.model = model;
            },

            checkDepartmentAssignment(pin) {
                this.model.dep_assignment.forEach((assignment) => {
                    if (assignment.id === pin) {
                        return true;
                    }
                });

                return false;
            }
        },

        computed: {
            role() {
                console.log(this.model.roles[0].id);

                return this.model.roles[0].id
            }
        },

        data() {
            return {
                creating: false,
                model: {
                    id: 0,
                    dep_assignment: [],
                    roles: [{
                        id: 1
                    }]
                },
                updating: false
            }
        },

        props: [
            'deleteUrl'
        ],

        mounted() {

        }

    }
</script>