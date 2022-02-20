import { Component, OnInit, ViewChild } from '@angular/core';
import { Room } from './room';
import { RoomService } from './room.service';
import { MatTableDataSource } from '@angular/material/table'
import {MatTableModule} from '@angular/material/table';
import { MatSort } from '@angular/material/sort';
import { MatPaginator } from '@angular/material/paginator';


@Component({

  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']

})

export class AppComponent implements OnInit {

  dataSource: MatTableDataSource<Room>;
  rooms: Room[] = [];
  columns: string[] = ['nome', 'horario', 'disp', 'agendar'];
  error = '';
  success = '';

  @ViewChild(MatSort, {static: true}) sort: MatSort;
  @ViewChild(MatPaginator, {static: true}) paginator: MatPaginator
  
  constructor(private roomService: RoomService) {}

  ngOnInit(): void {

    this.getRooms();

  }

  getRooms(): void {

    this.roomService.getAll().subscribe(

      (data: Room[]) => {

        for(let i = 0; i < data.length; i++){

          if (data[i].disp === 1){
            data[i].disp = '✔️'
          }
          else {
            data[i].disp = '❌'
          }

        }

        this.rooms = data;
        this.dataSource = new MatTableDataSource(data)
        this.dataSource.sort = this.sort;
        this.dataSource.paginator = this.paginator;

      },

      (err) => {

        console.log(err);
        this.error = err;

      }
    );

  }

  applyFilter(event: KeyboardEvent) {
    const filterValue = (event.target as HTMLInputElement).value;

    this.dataSource.filter = filterValue.trim().toLowerCase()
    console.log(this.dataSource.filter)
  }

  onSubmit(form: string) {
    this.resetAlerts();

    this.roomService.send(form.trim().toUpperCase()).subscribe()
    //document.location.reload()

  }

  resetAlerts() {
    this.error = '';
    this.success = '';
  }

  book(data: any) {
    if (data.disp === "✔️"){
      //console.log(data)
      this.roomService.book(data).subscribe()
      //document.location.reload()
    }
    else{
      this.error = 'Sala ja está ocupada'
    }
  }
}