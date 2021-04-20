<template>
  <div>
    <h1>Matches</h1>
    <p>
      <nuxt-link :to="matchesLink">
        Continue swiping
      </nuxt-link>
    </p>
  </div>
</template>

<script>
export default {
  async asyncData ({ error, params, $axios }) {
    const { hash } = params
    try {
      const { data: swipes } = await $axios.get(`/api/game/${hash}/swipe`)
      return { swipes }
    } catch ({ response }) {
      error({ statusCode: response.status, message: response.data.message })
    }
  },
  computed: {
    matchesLink () {
      return `/${this.$route.params.hash}`
    }
  }
}
</script>

<style>

</style>
