import pyxel

class Jeu:
    def __init__(self):
        pyxel.init(128, 128)
        self.vaisseau_x = 60
        self.vaisseau_y = 60
        pyxel.run(self.update, self.draw)

    def vaisseau_deplacement(self):
        if pyxel.btn(pyxel.KEY_RIGHT) and self.vaisseau_x<120:
            self.vaisseau_x += 1
        if pyxel.btn(pyxel.KEY_LEFT) and self.vaisseau_x>0:
            self.vaisseau_x += -1
        if pyxel.btn(pyxel.KEY_DOWN) and self.vaisseau_y<120:
            self.vaisseau_y += 1
        if pyxel.btn(pyxel.KEY_UP) and self.vaisseau_y>0:
            self.vaisseau_y += -1

    def update(self):
        self.vaisseau_deplacement()

    def draw(self):
        pyxel.cls(0)
        pyxel.rect(self.vaisseau_x, self.vaisseau_y, 8, 8, 1)
        
Jeu()