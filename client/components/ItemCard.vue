<template>
  <b-card
    :title="item.title"
    :img-src="item.image"
    :img-alt="item.title"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text v-if="item.description">
      {{ item.description }}
    </b-card-text>

    <div v-if="controlls">
      <b-button variant="outline-danger" @click="$emit('Dislike', item.id)">
        Dislike
      </b-button>
      <b-button variant="outline-success" @click="$emit('Like', item.id)">
        Like
      </b-button>
    </div>
  </b-card>
</template>

<script>
export default {
  props: {
    controlls: {
      type: Boolean,
      default: true
    },
    item: {
      type: Object,
      default: () => ({
        id: 0,
        title: '',
        description: null,
        image: null
      })
    }
  }
}
</script>

<style>
  .card {
    margin: 2rem auto 0;
    text-align: center;
  }
</style>
