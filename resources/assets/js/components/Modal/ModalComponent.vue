<template>
     <div class="modal fade" v-bind:id="modalname" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{title}}</h4>
            </div>
            <div class="modal-body">
                <slot></slot>
            </div>
            <div class="modal-footer">
                <slot name="buttons"></slot>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        //modal-dialog modal-lg
        props: ['modalname', 'title'],
        data: function(){
            return {
                classModal: this.modalclass
            }
        }
    }
</script>
