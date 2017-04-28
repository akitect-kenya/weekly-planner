<script>
    export default {

        methods: {
            create() {
                this.creating = true;
            },

            cancel() {
                this.creating = false;
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
            }
        },

        data() {
            return {
                creating: false,
            }
        },

        props: [
            'deleteUrl'
        ],

        mounted() {

        }

    }
</script>