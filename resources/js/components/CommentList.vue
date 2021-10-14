<template>
    <div>
        <button @click="getComments" class="btn btn-default">댓글 불러오기</button>
        <comment-item v-for="(comment, index) in comments"
                    :key="index" :comment="comment"/>
        댓글 리스트
    </div>
</template>

<script>

import CommentItem from './CommentItem.vue'

export default {
    props: ['post', 'loginUserId'], 
    components: {CommentItem},
    data() {
        return {
            comments : [],
        }
    },

    methods: {
        getComments() {
            this.comments=['1st comment', '2nd comment',
            '3rd commnet', '4th comment', '5th comment', ]
        }
    }
}
</script>
