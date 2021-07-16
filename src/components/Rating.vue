<template>
  <div class="text-left">
   <v-rating v-model="rating"
  color="teal"
  hover
  length="5"
  size="20"
  value="3"
></v-rating>
  </div>
</template>
<script>
export default {
  name: 'Rating',
  data: () => ({
    rating: 5
  })
}

</script>
