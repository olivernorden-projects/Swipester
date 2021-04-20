<template>
  <h1>{{ game.subject.title }}</h1>
</template>

<script>
export default {
  async asyncData ({ error, params, $axios }) {
    const { hash } = params
    try {
      const { data: game } = await $axios.get(`/api/game/${hash}`)
      return { game }
    } catch (e) {
      error({ statusCode: 404, message: 'Game not found' })
    }
  }
}
</script>

<style>

</style>
