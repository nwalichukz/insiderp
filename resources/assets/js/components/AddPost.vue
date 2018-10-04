<template>
    <div>
        <li class="text-sm mb-2"> <a href="#" @click="show" title="post to public">Add Post</a> </li>
        <modal name="addPost"
                :height="400"
                :width="500">

               <div class="py-12 px-10">
                   <form action="" method="post" enctype="multipart/form-data" id="" @submit.prevent="login">
                
                    <div class="mb-3">
                        <input type="text" name="title" class="modal-input" placeholder="Enter the title of the post max of ten words" required v-model="fields.title">
                    </div>
                    
                    <div class="mb-3">
                    <textarea name="post" rows="3" id="textPost" class="modal-input" placeholder="Share your thought on anything you care about" required v-model="fields.post"></textarea>
                </div>
                     <div class="mb-3">
                    <select name="category" class="modal-select" v-model="fields.category">
                        <option value="">Select Category</option>
                        <option >Politics</option>
                        <option >Education</option>
                        <option >Sports</option>
                        <option >Religion</option>
                        <option >Romance</option>
                        <option >Technology</option>
                        <option >Entertainment</option>
                        <option >Culture</option>
                        <option >Travel</option>
                         <option >Betting</option>
                         <option >Tourism</option>
                          <option >Job</option>
                          <option >NYSC</option>
                         <option >Jokes</option>
                         <option >Foreign</option>
                         <option >Events</option>
                         <option >Fashion</option>
                         <option >Birthdays</option>
                         <option >CarTalk</option>
                        <option >Entrepreneurship</option>
                         <option >Health</option>
                        <option >Travel</option>
                        <option >Literature Review</option>
                        <option >Art and Craft</option>
                        <option >Campus Gist</option>

                    </select>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                        <div class="">
                            <label for="attachment">Post with image:</label>
                            <input type="file" name="image" onchange="readURL(this);" id="images" multiple="true" class="p-1 bg-white text-black" @onChange="addImage"/>
                            <div id="image-holder" class="w-full"></div>
                            <img class="showimg rounded shadow" src="#" alt="" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Post</button>
                </div>
                </form>

               </div>
        </modal>
    </div>
</template>
<script>
    export default {
        name: 'AddPost',
        data () {
            return {
                fields: {},
            }
        },
        methods: {
            show()
            {
                this.$modal.show('addPost');
            },

            close() {
                this.$modal.hide('addPost')
            },

            login()
            {
                console.log(this.fields);
            },

            addImage() {
                fields.image = 'image';
            }
        }
    }
</script>