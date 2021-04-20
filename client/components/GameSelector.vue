<template>
  <div class="game-selector__container">
    <b-button v-for="subject in availableGames" :key="subject.id" variant="outline-primary" class="game-selector__btn">
      {{ subject.title }}
    </b-button>
  </div>
</template>

<script>
export default {
  props: {
    availableGames: {
      type: Array,
      default: () => ([])
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
