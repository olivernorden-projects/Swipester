<template>
  <b-container>
    <h1>{{ game.subject.title }}</h1>
    <ItemCard :item="nextItem" @Like="Like" @Dislike="Dislike" />
  </b-container>
</template>

<script>
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
    Like () {
      alert('like')
    },
    Dislike () {
      alert('dislike')
    }
  }
}
</script>

<style>

</style>
