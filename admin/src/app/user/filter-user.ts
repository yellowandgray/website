import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterUser'
})
export class filterUser implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.student_name.toLowerCase().indexOf(value.toLowerCase()) !== -1);
      }
    } else {
      return []
    }
  }
}