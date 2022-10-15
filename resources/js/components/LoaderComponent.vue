<template>
    <div class="ms_loader-wrapper">
        Loading<span class="ms_animated-dot-1">.</span><span class="ms_animated-dot-2">.</span><span class="ms_animated-dot-3">.</span>
    </div>
</template>

<script>
export default {
    name: 'LoaderComponent',
}
</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

.ms_loader-wrapper {
    margin-top: 4rem;
    margin-inline: auto;
    width: fit-content;
    color: $secondary-color;
    font-size: 2rem;

    > .ms_animated-dot-1 {
        animation: first-dot 400ms infinite;
        animation-delay: 600ms;

        @keyframes first-dot {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 0;
            }
        }
    }
    > .ms_animated-dot-2 {
        animation: second-dot 400ms infinite;
        animation-delay: 300ms;

        @keyframes second-dot {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 0;
            }
        }
    }
    > .ms_animated-dot-3 {
        animation: third-dot 400ms infinite;
        animation-delay: 0;

        @keyframes third-dot {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 0;
            }
        }
    }
}
</style>