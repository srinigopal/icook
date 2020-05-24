<template>
    <div>
        <color-picker
            theme="light"
            :color="color"
            :sucker-hide="true"
            @changeColor="changeColor"
        />
    </div>
</template>

<script>
    import colorPicker from '@caohenghu/vue-colorpicker'

    export default {
		
        components: {
            colorPicker
        },
        data() {
            return {
                color: '#59c7f9',
            }
        },
        methods: {
            changeColor(color) {
                const { r, g, b, a } = color.rgba
                this.color = `rgba(${r}, ${g}, ${b}, ${a})`
				
				var colorString = this.rgb2hex(color.rgba.r, color.rgba.g, color.rgba.b ,true);
				vueEventBus.$emit('selected-color-code', colorString);
            },
			rgb2hex(r, g, b , toUpper) {
				const change = val => ('0' + Number(val).toString(16)).slice(-2)
				const color = `${change(r)}${change(g)}${change(b)}`
				return toUpper ? color.toUpperCase() : color
			}
        }
    }
</script>