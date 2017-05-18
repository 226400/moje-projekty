#include<iostream>

using namespace std;

struct Lista{
int var;
Lista *ptr;
};

void addFront(Lista *&start);
void deleteFront(Lista *&start);
void deleteBack(Lista *&start);
void printList(Lista *&start);
void deleteList(Lista *&start);
int countList(Lista *&start);
void addBack(Lista *&start);

int main ()
{
Lista *start;
start=NULL;

addFront(start);
printList(start);
//cout<<"\n"<<start->var<<endl;
//cout<<"\n"<<countList(start)<<endl;
addBack(start);
deleteFront(start);
//deleteList(start);
cout<<"\n"<<countList(start)<<"\n"<<endl;
printList(start);
deleteBack(start);
printList(start);
return 0;

};

void addFront(Lista *&start){
Lista *p;
p=start;
for(int i=0; i<10; i++)
{
p= new Lista;
p->var=i;
p->ptr = start;
start = p;
}


}


void printList(Lista *&start)
{
Lista *p;
p=start;
while(p){
  cout<<p->var<<"  "<<endl;
  p=p->ptr;
}
}

void deleteList(Lista *&start)
{
Lista *p;

while(start)
{
  p=start;
  cout<<start->var << "\t";
  start=start->ptr;
  if(start) cout<<start->var << "\n";

  delete p;
}
}

int countList(Lista *&start){
int V=0;
Lista *p;
p=start;

 while (p)
 {
   V++;
  p=p->ptr;
 };
  return V;
}

void deleteFront(Lista *&start)
{
Lista *p;
p=start;
if(p)
{
  start=start->ptr;
  delete p;
}else{
  cout<<"Lista pusta"<<endl;
}

}

void addBack(Lista *&start)
{
  Lista *p, *n;
  p=start;
if(p){
  while(p->ptr) p=p->ptr;
  n = new Lista;
  n->var=99;
  n->ptr= NULL;
  p->ptr=n;
}
else{
  cout<<"\n Lista Pusta"<<endl;

}

};

void deleteBack(Lista *&start)
{
  Lista *p= start;

  if(p)
  {
if(p->ptr)
{
  while(p->ptr->ptr) p=p->ptr;
  delete p->ptr;
  p->ptr=NULL;


  }else{
    delete p;
    start=NULL;
  }
}
}
