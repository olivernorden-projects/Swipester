<template>
  <b-container>
    <h1>{{ game.subject.title }}</h1>
    <ItemCard :item="nextItem" @Like="Like" @Dislike="Dislike" />
  </b-container>
</template>

<script>
import axios from 'axios'
import ItemCard from '../../components/ItemCard'

export default {
  components: {
    ItemCard
  },
  async asyncData ({ error, params, $axios }) {
    const { hash } = params
    try {
      const { data: game } = await $axios.get(`/api/game/${hash}`)
      return { game }
    } catch ({ response }) {
      error({ statusCode: response.status, message: response.data.message })
    }
  },
  computed: {
    nextItem () {
      return this.game.subject.items[0]
    }
  },
  methods: {
    Like (subjectItemId) {
      this.Swipe(subjectItemId, true)
    },
    Dislike (subjectItemId) {
      this.Swipe(subjectItemId, false)
    },
    async Swipe (subjectItemId, like) {
      const { hash } = this.$route.params
      const liked = like ? 1 : 0
      try {
        await axios.post(`/api/game/${hash}/swipe/${subjectItemId}/${liked}`)
      } catch (error) {}

      // Update subject items list
      this.game.subject.items = this.game.subject.items.filter(item => item.id !== subjectItemId)
    }
  }
}
</script>

<style>

</style>
