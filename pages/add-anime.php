<h2 id="add-anime-title">Ajouter un anime</h2>
<section id="form-add-anime">
    <form action="#" method="post">
        <div id="top-block-add-anime">
            <div id="top-left">
                <div class="col-3" id="input-name-add-anime">
                    <input class="effect" type="text" name="name" autocomplete="off">
                    <label for="name">Nom</label>
                    <span class="focus-border"></span>
                </div>
                <div class="col-3" id="input-select-type">
                    <select name="type" id="type" size="1" class="effect">
                        <option value="Shonen">Shonen</option>
                        <option value="Seinen">Seinen</option>
                        <option value="Shojo">Shojo</option>
                        <option value="Josei">Josei</option>
                        <option value="Kodomomuke">Kodomomuke</option>
                    </select>
                    <label for="type">Type</label>
                    <span class="focus-border"></span>
                </div>
                <div class="col-3" id="input-rate-container">
                    <input class="effect" type="number" name="rate" id="rate" min="0" max="5">
                    <label for="rate">Note (entre 0 et 5)</label>

                </div>
            </div>
            <aside id="top-right">
                <div id="input-release-date-container">
                    <input type="date" name="release" id="release">
                    <label for="release">Date de sortie:</label>
                </div>
                <label for="synopsis">Synopsis</label>
                <div id="textarea-container">
                    <textarea name="synopsis" id="synopsis" placeholder="..."></textarea>
                </div>
            </aside>
        </div>
        <div id="bot-block-add-anime">
            <div id="bot-left">
                <label for="img-anime">
                    <span>Choisir une image</span>
                <input type="file" id="img-anime" name="img-anime" accept="image/png, image/jpeg" />
                </label>
                <div id="container-img-added">
                    <span id="img-added"><p></p></span>
                </div>
            </div>
            <div id="bot-right">
                <button id="submit-add-anime">Ajouter</button>
            </div>
        </div>
    </form>
</section>