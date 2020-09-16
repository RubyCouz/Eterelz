<template>

</template>
<script>

export default {

  methods: {

  },
 computed: {
   listeners() {
     return {
       ...this.$listeners,
       button: event => this.$emit('button', this.info)
     }
   }
 },

}
</script>