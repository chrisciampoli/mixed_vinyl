import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * song-controls_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static values = {
      infoUrl: String
    }

    async play(event) {
        event.preventDefault();

        const response = await fetch(this.infoUrlValue);
        const data = await response.json();
        const audio = new Audio(data.url);
        console.log(data);
        audio.play();
    }
}
