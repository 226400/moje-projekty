
class Tablica {

  int _rozmiar;
  int _wypelnienie;
  int*  _Tablica;
  void powieksz(int);

public:
  Tablica();
  Tablica(int);
  ~Tablica();
  void przypisz(int, int);
  void przypisz1(int, int);
  void odczytaj(int, int&);
  void zamien();
  int wartosc(int);
  void pokaz_rozmiar(int&);
  //dostep do dowolnego elem tab bez sprawdzania zaresu
int& operator [] (int);

//odczyt elementu tab bez prawdzania zakresu
int operator [] (int) const;

};
