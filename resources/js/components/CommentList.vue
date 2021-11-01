<template>
    <div>
        <button @click="getComments"
            class="btn btn-default">댓글 불러오기</button>
        <comment-item v-for="(comment, index) in comments"
                :key="index" :comment="comment"/>
    </div>
</template>

<script>
import CommentItem from './CommentItem.vue';
export default {
    props: ['post', 'loginuser'],
    components: {CommentItem},
    data() {
        return {
            comments : [],
        }
    },

    methods: {
        getComments() {
            // this.comments=['1st comment', '2nd comment',
            //     '3rd comment', '4th comment', '5th comment'];
            // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
            // 즉, axios를 이용해서 요청
            // 서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
            // this.comments에 할당.
            axios.get('/comments/'+this.post.id)
            .then(response=>{
                // console.log(response);
                this.comments = response.data;
            }).catch(error=>{
                console.log(error);
            });
        }
    }
}
</script>