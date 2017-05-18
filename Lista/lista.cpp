#include<iostream>
#include"Ilista.hh"
using namespace std;




void List::addFront(Lista *&start){
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


void List::printList(Lista *&start)
{
Lista *p;
p=start;
while(p){
  cout<<p->var<<"  "<<endl;
  p=p->ptr;
}
}

void List::deleteList(Lista *&start)
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

int List::countList(Lista *&start){
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

void List::deleteFront(Lista *&start)
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

void List::addBack(Lista *&start)
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

void List::deleteBack(Lista *&start)
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
