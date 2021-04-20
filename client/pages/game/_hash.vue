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
    } catch ({ response }) {
      error({ statusCode: response.status, message: response.data.message })
    }
  }
}
</script>

<style>

</style>
