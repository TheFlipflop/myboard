<template>
    <div>
        <div v-for="(reply, index) in items">
            <reply-component :data="reply" @deleted="remove(index)"></reply-component>
        </div>
    </div>
</template>

<script>
    import ReplyComponent from './ReplyComponent.vue';

    export default {
        props: ['data'],

        components: { ReplyComponent },

        data() {
            return {
                items: this.data
            }
        },

        methods: {
            remove(index) {
                this.items.splice(index, 1);

                this.$emit('removed');

                flash('Reply was deleted');
            }
        }
    }
</script>