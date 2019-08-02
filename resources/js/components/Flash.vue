<template>
    <div class="alert alert-info alert-flash" role="alert" v-show="show">
        <strong>{{ body }}</strong> 

    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
                body: '',
                show: false
            }
        },
        created() {
            if (this.message) {
                this.flash(this.message);
            }
            window.events.$on(
                'flash', message => this.flash(message)
                );
        },
        methods: {
            flash(message) {
                this.body = message;
                this.show = true;
                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>

<style>
.alert-flash {
    position: fixed;
    right: 25px;
    bottom: 25px;
}
.alert-info
{
    color: #155724;
    background-color: #4fc08d;
    border: 1px solid #4fc08d;
}
.alert
{
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style> 