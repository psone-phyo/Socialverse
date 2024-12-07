<!-- <template>
    <div>
        <h1>Pusher Test</h1>
        <p>
            Publish an event to channel <code>my-channel</code> with event name
            <code>my-event</code>; it will appear below:
        </p>
        <div id="app">
            <ul>
                <li v-for="(message,index) in messages" :key="index">
                    {{ message }}
                </li>
            </ul>
        </div>
    </div>
</template>


<script>
import "https://cdn.jsdelivr.net/npm/vue/dist/vue.js"
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher("5226d6cfa1b966932366", {
    cluster: "ap1",
});

var channel = pusher.subscribe("my-channel");
channel.bind("my-event", function (data) {
    app.messages.push(JSON.stringify(data));
});

// Vue application
const app = new Vue({
    el: "#app",
    data: {
        messages: [],
    },
});
</script>

<style lang="stylus" scoped></style> -->
