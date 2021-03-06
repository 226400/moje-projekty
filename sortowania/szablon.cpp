#include <iostream>
#define N 30

using namespace std;

int tab[N] = {30,29,28,27,26,25,1,2,3,4,5,6,7,24,23,22,21,20,19,18,8,9,10,11,17,16,15,13,14,12};
int t[N];  // Tablica pomocnicza

/* Scalanie dwoch posortowanych ciagow
tab[pocz...sr] i tab[sr+1...kon] i
wynik zapisuje w tab[pocz...kon] */
void merge(int pocz, int sr, int kon)
{
int i,j,q;
for (i=pocz; i<=kon; i++) t[i]=tab[i];  // Skopiowanie danych do tablicy pomocniczej
i=pocz; j=sr+1; q=pocz;                 // Ustawienie wskaźników tablic
while (i<=sr && j<=kon) {         // Przenoszenie danych z sortowaniem ze zbiorów pomocniczych do tablicy głównej
if (t[i]<t[j])
tab[q++]=t[i++];
else
tab[q++]=t[j++];
}
while (i<=sr) tab[q++]=t[i++]; // Przeniesienie nie skopiowanych danych ze zbioru pierwszego w przypadku, gdy drugi zbiór się skończył
}

/* Procedura sortowania tab[pocz...kon] */
void mergesort(int pocz, int kon)
{
int sr;
if (pocz<kon) {
sr=(pocz+kon)/2;
mergesort(pocz, sr);    // Dzielenie lewej części
mergesort(sr+1, kon);   // Dzielenie prawej części
merge(pocz, sr, kon);   // Łączenie części lewej i prawej
}
}

int main() {
int i;

cout<<"Zbior przed sortowaniem:\n"<<endl;
for (i=0; i<N; i++)
cout<<tab[i]<<endl;

mergesort(0,N-1);

cout<<"\nZbior po sortowaniu:\n"<<tab[i]<<endl;
for (i=0; i<N; i++)
cout<<tab[i]<<endl;
}
