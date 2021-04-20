<template>
  <div>
    <p>
      Opponent link: <a :href="opponent.link">{{ opponent.link }}</a>
    </p>
  </div>
</template>

<script>
export default {
  props: {
    opponent: {
      type: Object,
      default: () => ({
        id: 0,
        link: ''
      })
    }
  }
}
</script>
