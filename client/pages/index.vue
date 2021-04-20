<template>
  <b-container>
    <h1>Swipester</h1>
    <p>Swipester is a game where two people are shown various items realated to a given subject, such as movies or food, and asked to either like or dislike the item to find items with common approval.</p>

    <h3>Start new game</h3>
    <GameSelector :available-games="availableGames" />
  </b-container>
</template>

<script>
import GameSelector from '../components/GameSelector'

export default {
  components: {
    GameSelector
  },
  async asyncData ({ $axios }) {
    const { data: availableGames } = await $axios.get('/api/game')
    return {
      availableGames
    }
  }
}
</script>
