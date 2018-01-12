<template>
    <div v-bind:id="modalname" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="modalname">
        <div v-bind:class="classModal || 'modal-dialog modal-lg'" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        //modal-dialog modal-lg
        props: ['modalname', 'modalclass'],
        data: function(){
            return {
                classModal: this.modalclass
            }
        }
    }
</script>
