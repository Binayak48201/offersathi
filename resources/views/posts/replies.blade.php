
<replies :attributes="{{ $reply }}" inline-template>
    <div class="review-single pt-30">
        <div class="media">
            <div class="media-body">
                <div class="review-wrapper clearfix">
                    <div class="flex justify-between mb-2">
                        <div>
                            <h4 class="" style="color: #000">
                                {{ $reply->owner->name }}
                            </h4>
                        </div> 

                        <div>
                            {{ $reply->created_at->diffForHumans() }}
                        </div> 

                    </div>

                        <div v-if="editing">
                            <textarea class="w-full" rows="3" v-model="body"></textarea>
                            <button @click="update" class="btn btn-xs" style="background-color: #ff6666;">
                                Update
                            </button>
                            <button class="btn-link btn-info" @click="editing=false">Cancel</button>
                        </div>

                    <p v-else class="copy" v-text="body"></p>
                     @can('update', $reply)
                        <button type="button" class="btn-link" @click="editing = true">Edit</button>
                        <button type="button" class="btn-link" @click="destroy">Delete</button>
                    @endcan
                </div>                  
            </div>
        </div>
    </div>

</replies>
