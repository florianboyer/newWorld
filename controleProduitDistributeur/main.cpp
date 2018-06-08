#include "mainwindow.h"
#include <QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    Dialog monDialogue;
    if(monDialogue.exec()==QDialog::Accepted){
        MainWindow w(&monDialogue,NULL);
        w.show();
        return a.exec();
    }
    else{
        return -124;
    }
}
