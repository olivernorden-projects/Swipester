<template>
  <b-container>
    <h1>Matches</h1>
    <p>
      <nuxt-link :to="matchesLink">
        Continue swiping
      </nuxt-link>
    </p>
    <div v-if="match.matches.length" class="matches__container">
      <ItemCard v-for="match in match.matches" :key="match.id" :item="match" :controlls="false" />
    </div>
    <p v-else>
      No matches yet, keep swiping or start a new game
    </p>
  </b-container>
</template>

<script>
export default {
  async asyncData ({ error, params, $axios }) {
    const { hash } = params
    try {
      const { data: match } = await $axios.get(`/api/game/${hash}`)
      return { match }
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
  .matches__container {
    display: flex;
    flex-wrap: wrap;
  }
</style>
