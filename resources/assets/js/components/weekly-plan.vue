<script>
    export default {

        methods: {
            addSubjectPlan() {
                this.subjectPlans.push($.extend({}, this.subjectPlan));
            }
        },

        data() {
            return {
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

        props: [],

        name: 'weekly-plan'

    }
</script>