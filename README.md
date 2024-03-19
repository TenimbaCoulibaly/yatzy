*Contrairement a la soumission precedente, je n'ai pas une grande maitrise de PHP. J'ai apporté les changements qui me semblaient être nécéssaire au code précédent dans le fichier Assignment3 pour la version PHP. J'espere recevoir un retour de votre part afin de m'aider à m'ameliorer avec PHP.*


</br>
</br>
</br>

**Description et instructions du jeu:** 
---
</br>

Le joueur lance les cinq dés pour obtenir un motif (c'est-à-dire une disposition particulière des dés) qui rapporte des points. Il a droit à trois lancers de dés par tour. Après chaque lancer, il peut choisir de mettre de côté certains de ces dés et de relancer les autres.
</br>
</br>

Après un maximum de trois lancers, le joueur doit choisir entre marquer une figure pour laquelle il remplit les conditions ou rayer une figure.  Nous avons les figures:
</br>

1-> dans laquelle, la condition est d’obtenir un maximum de dés de face1; on calcule ensuite la somme des  dés de face1 et le score maximum doit etre de 5 points;
</br>

2-> dans laquelle, la condition est d’obtenir un maximum de dés de face2; on calcule ensuite la somme des  dés de face2 et le score maximum doit etre de 10 points;
</br>

3-> dans laquelle, la condition est d’obtenir un maximum de dés de face3; on calcule ensuite la somme des  dés de face3 et le score maximum doit etre de 15 points;
</br>

4-> dans laquelle, la condition est d’obtenir un maximum de dés de face4; on calcule ensuite la somme des  dés de face4 et le score maximum doit etre de 20 points;
</br>

5-> dans laquelle, la condition est d’obtenir un maximum de dés de face5; on calcule ensuite la somme des  dés de face5 et le score maximum doit etre de 25 points;
</br>

6-> dans laquelle, la condition est d’obtenir un maximum de dés de face6; on calcule ensuite la somme des  dés de face6 et le score maximum doit etre de 30 points;
</br>

Brelan ou Three of a kind-> dans laquelle, la condition est d’obtenir trois dés de même valeur; on calcule ensuite la somme des trois dés identiques et le score maximum doit etre de 18 points;
</br>

Carré ou Four of a kind-> dans laquelle, la condition est d’obtenir quatre dés de même valeur; on calcule ensuite la somme des quatre dés identiques et le score maximum doit etre de 24 points;
</br>

Full House-> dans laquelle, la condition est d’obtenir un brelan et deux dés de même valeur; score maximum doit etre de 25 points;
</br>

Petite suite ou Small straight-> dans laquelle, la condition est d’obtenir une suite croissante de quatre dés; score maximum doit etre de 30 points;
</br>

Grande suite ou Large straight-> dans laquelle, la condition est d’obtenir une suite croissante de cinq dés; score maximum doit etre de 40 points;
</br>

Yatzee-> dans laquelle, la condition est d’obtenir cinq dés de même valeur; score maximum doit etre de 50 points;
</br>

Chance-> dans laquelle, la condition qu'il n'y a aucune condition et le score maximum est de 30 points.
</br></br>

Ci-dessous se trouve un exemple en images:</br>
</br>

![image1](image1.png)
![image2](image2.png)
![image3](image3.png)
![image4](image4.png)
![image5](image5.png)
![image6](image6.png)
![image7](image7.png)
![image8](image8.png)
</br>
</br>
</br>
</br>





**Implementation du jeu:**
---
<br>

Cette documentation décrit la mise en œuvre du jeu Yatzy dans lequel la logique du jeu, y compris le lancement des dés et le calcul des scores, est gérée par un backend PHP, tandis que l'interface utilisateur et les interactions sont gérées par JavaScript qui effectue des appels AJAX au serveur PHP. Cette approche permet de dissocier la logique du jeu de la couche de présentation, ce qui permet d'obtenir une base de code plus structurée et plus facile à maintenir.
<br>
</br>

Le backend PHP est responsable du maintien de l'état du jeu, du traitement des actions de jeu (comme le lancement des dés et le calcul des scores) et du stockage de ces informations dans la session pour une persistance à travers les requêtes. Au début, une session est lancée pour suivre l'état du jeu à travers plusieurs requêtes AJAX. Cela comprend les scores des joueurs, le tour du joueur en cours et le nombre de jets de dés effectués pendant le tour en cours. 
<br>
changeTurn() : Change le joueur actif et réinitialise le nombre de jets pour le nouveau tour.
calculateEndGameScore() : Détermine le vainqueur en fonction des scores totaux accumulés par chaque joueur ou déclare un match nul si les scores sont égaux.
Fonctions de calcul des scores :
<br>
</br>
Les fonctions telles que calculateOnes(), calculateTwos(), etc., prennent en entrée un tableau de valeurs de dés et calculent le score pour la catégorie correspondante. Ces fonctions utilisent les fonctions de manipulation de tableaux de PHP pour calculer les scores selon les règles de Yatzy.
<br>
En ce qui concerne les fonctions AJAX:
changeTurn() : Envoie une requête pour changer de tour et met à jour l'interface utilisateur pour refléter le nouveau joueur actif.
calculateScores(dice) : Envoie la configuration actuelle des dés au serveur pour le calcul du score. Le tableau des scores est ensuite mis à jour en fonction de la réponse.
getEndGameScore() : Demande au serveur les résultats de la fin de la partie et affiche le message de victoire ou de match nul.


