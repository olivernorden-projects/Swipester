<template>
  <div class="game-selector__container">
    <b-button v-for="subject in availableGames" :key="subject.id" variant="info" class="game-selector__btn" @click="createGame(subject.id)">
      {{ subject.title }}
    </b-button>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: {
    availableGames: {
      type: Array,
      default: () => ([])
    }
  },
  methods: {
    async createGame (subjectId) {
      const { data: game } = await axios.post(`/api/game/${subjectId}`)
      const playerHash = game.players[0].hash
      this.$router.push(`/${playerHash}`)
    }
  }
}
</script>

<style>
  .game-selector__container {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
  }
  .game-selector__btn {
    margin: 0 .5rem;
  }
</style>
