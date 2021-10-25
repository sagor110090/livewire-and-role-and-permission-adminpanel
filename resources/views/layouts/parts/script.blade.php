<script src="{{ asset('backend') }}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('backend') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{ asset('backend') }}/libs/feather-icons/dist/feather.min.js"></script>
<script src="{{ asset('backend') }}/libs/prismjs/components/prism-core.min.js"></script>
<script src="{{ asset('backend') }}/libs/prismjs/components/prism-markup.min.js"></script>
<script src="{{ asset('backend') }}/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js"></script>
<script src="{{ asset('backend') }}/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{ asset('backend') }}/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<script src="{{ asset('backend') }}/js/theme.min.js"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
data-turbolinks-eval="false" data-turbo-eval="true"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"> </script>
<x-livewire-alert::scripts />
@include('sweetalert::alert')

@stack('js')
