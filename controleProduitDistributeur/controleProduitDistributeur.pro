#-------------------------------------------------
#
# Project created by QtCreator 2018-03-26T15:11:16
#
#-------------------------------------------------

QT       += core gui network

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = controleProduitDistributeur
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    dialog.cpp

HEADERS  += mainwindow.h \
    dialog.h

FORMS    += mainwindow.ui \
    dialog.ui


CONFIG += mobility
MOBILITY =

RESOURCES += \
    Ressources.qrc \
    icones.qrc
