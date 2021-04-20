<template>
  <b-container>
    <h1>{{ game.subject.title }}</h1>
    <div v-if="opponents.length">
      <Opponent v-for="opponent in opponents" :key="opponent.id" :opponent="opponent" />
    </div>
    <p>
      <b-button :to="matchesLink" variant="outline-success" class="mt-3">
        View matches
      </b-button>
    </p>
    <ItemCard v-if="nextItem" :item="nextItem" @Like="Like" @Dislike="Dislike" />
    <b-alert v-else show variant="secondary">
      No more items available
    </b-alert>
  </b-container>
</template>

<script>
import axios from 'axios'
import ItemCard from '../../components/ItemCard'
import Opponent from '../../components/Opponent'

export default {
  components: {
    ItemCard,
    Opponent
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
      return this.currentPlayer.swipes_left[0]
    },
    currentPlayer () {
      return this.game.players.find(player => player.hash === this.$route.params.hash)
    },
    opponents () {
      return this.game.players.filter(player => player.id !== this.currentPlayer.id)
    },
    matchesLink () {
      return `/${this.currentPlayer.hash}/matches`
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
      this.currentPlayer.swipes_left = this.currentPlayer.swipes_left.filter(item => item.id !== subjectItemId)
    }
  }
}
</script>

<style>

</style>
